<template>
        <div>
            <hr>

            <div class="row">
            <div class="col-6 form-group">
                <label for="name">:الاسم</label>
                <input v-model="name" type="text"  name="name" class="form-control" placeholder="enter the name" required />
                <span v-if="!name" class="text-danger">ارجو تعبئة الحقل</span>
            </div>

            <div class="col-6 form-group">
                <label for="num">:الرقم الوظيفي</label>
                <input v-model="num" type="number" name="num" class="form-control" placeholder="enter the number" required />
                <span v-if="!num" class="text-danger">ارجو تعبئة الحقل</span>
            </div>

            <div class="col-6 form-group">
                <label for="num">:القسم</label>
                <!-- <input v-model="section" type="text" name="num" class="form-control" placeholder="enter the section" required /> -->
                <select class="form-control" name="section" id=""  @change="onChangeSelect($event)">
                    <option  value="انتاج">انتاج</option>
                    <option  value="ادارة">ادارة</option>
                    <option  value="مالية">مالية</option>
                </select>
            </div>

            <div class="col-6 form-group">
                <label for="num">:الراتب</label>
                <input v-model="salary" type="number" name="num" class="form-control" placeholder="enter the salary" required />
                <span v-if="!salary" class="text-danger">ارجو تعبئة الحقل</span>
            </div>

            <div class="col-6 form-group">
                <label for="num">:الخصومات</label>
                <input v-model="discounts" type="number" name="num" class="form-control" placeholder="enter the discounts" required />
                <span v-if="!discounts" class="text-danger">ارجو تعبئة الحقل</span>
            </div>

            <div class="col-6 form-group">
                <label for="num">:باقي الراتب</label>
                <input v-model="net_salary" type="number" disabled name="num" class="form-control" placeholder="net_salary" required />
            </div>

            <div class=" form-group" style="margin-left: 16px;">
                <button type="button" @click="addStd()" :class="class_style">Save</button>
                <button type="button" @click="totalUnless()" :class="class_style">calc net_salary</button>
            </div>

        </div>

        <hr>

        <table class="table table-bordered" border="2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>number</th>
                    <th>section</th>
                    <th>salary</th>
                    <th>discount</th>
                    <th>net_salary</th>
                    <th>Action</th>
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
                            <button type="button" @click="edit_std(human, data.indexOf(human))" class="btn btn-info">Edit</button>
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
                class_style:"btn btn-info",
                title:'button to plus',
                error: null,
                check: false,
                edit: false,
                index: null,
                data: [],
                option_usr: "انتاج"
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

                addStd(){
                    if(!this.name){
                        return alert('please enter the name')
                    }
                    if(!this.num){
                        return alert('please enter the number')
                    }
                    if(!this.salary){
                        return alert('please enter the salary')
                    }
                    if(!this.discounts){
                        return alert('please enter the discounts')
                    }
                    if(!this.net_salary){
                        return alert('please enter the net salary')
                    }
                    if(!this.edit) {
                        var last_item = this.data[this.data.length - 1]
                        const std = {
                            id: last_item.id+1 ,
                            name:this.name,
                            num:this.num,
                            section:this.option_usr,
                            salary:this.salary,
                            discounts:this.discounts,
                            net_salary:this.net_salary
                        }
                        this.data.push(std)
                        this.class_style = "btn btn-dark"
                        axios.post(`add_user`, {
                            name: this.name,
                            num: this.num,
                            section:this.option_usr,
                            salary:this.salary,
                            discounts:this.discounts,
                            net_salary:this.net_salary
                        })
                    }
                    else {
                        this.data[this.index].name = this.name
                        this.data[this.index].num = this.num
                        axios.post(`edit_user/`+ this.std_Id, {
                            name: this.name,
                            num: this.num,
                            section:this.section,
                            salary:this.salary,
                            discounts:this.discounts,
                            net_salary:this.net_salary
                        })
                        this.index = null
                        this.edit = false
                        this.name = null
                        this.num = null
                        this.section = null
                        this.salary = null
                        this.discounts = null
                        this.net_salary = null
                    }

                },
                edit_std(data,index) {
                    try{
                        this.std_Id = data.id
                        this.name = data.name
                        this.num = data.num
                        this.section = data.section
                        this.salary = data.salary
                        this.discounts = data.discounts
                        this.net_salary = data.net_salary
                        this.edit = true
                        this.index = index
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
                }
            },
}
</script>
