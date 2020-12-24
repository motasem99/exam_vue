<template>
        <div>
            <button class="btn btn-info"><a href="/add">اضف موظف جديد</a></button>

            <hr>

        <table class="table table-bordered" border="2">
            <thead>
                <tr>
                    <th>الاسم</th>
                    <th>الرقم الوظيفي</th>
                    <th>القسم</th>
                    <th>الراتب</th>
                    <th>الخصومات</th>
                    <th>صافي الراتب</th>
                    <th>الحدث</th>
                </tr>
            </thead>
            <tbody>

                    <tr v-for="(human) in data">
                        <td> {{ human.name }} </td>
                        <td> {{ human.num }} </td>
                        <td> {{ human.section }} </td>
                        <td> {{ human.salary }} </td>
                        <td> {{ human.discounts }} </td>
                        <td> {{ human.net_salary }} </td>
                        <td>
                            <button type="button" @click="edit_std(human, data.indexOf(human))" class="btn btn-info"><a :href="`/add?edit=true&id=${std_Id}`" >تعديل</a></button>
                        </td>
                </tr>

            </tbody>
        </table>
        <hr>

    </div>
</template>


<script>
export default {
    data () {
                return {
                std_Id:null,
                name:'',
                num:null,
                section:null,
                salary:null,
                discounts:null,
                net_salary:null,
                message: "",
                error: null,
                check: false,
                edit: false,
                index: null,
                data: [],
                option_usr: 'انتاج'
            }
        },

            mounted () {
                this.getUsers()

            },

            methods:{

                getUsers() {
                        axios.get('get_users')
                        .then(res => {
                          this.data = res.data.data
                        }).catch(error => {
                            console.log(error)
                        })
                },

                edit_std(data,index) {
                    try{
                        this.std_Id = data.id
                    }
                    catch(err){
                        console.log(err)
                    }
                },
                totalUnless(){
                    var totalnet_salary =  this.salary - this.discounts
                    this.net_salary = totalnet_salary
                },

                onChangeSelect(event){
                   this.option_usr =  event.target.value
                },

            },
}
</script>
