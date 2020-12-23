<template>
        <div>

                <hr>
            <div>
            <span>{{ count }}</span>
            <button v-on:click="plus()"
            v-bind:title="title"
            type="button">
            click to plus</button>
        </div>

        <br>

        <hr>

        <div class="row">
            <div class="col-6 form-group">
                <label for="std_name">Std_name:</label>
                <input v-model="std_name" type="text" name="std_name" class="form-control" placeholder="enter the name">
                <span v-if="!std_name" class="text-danger">ارجو تعبئة الحقل</span>
            </div>

            <div class="col-6 form-group">
                <label for="std_degree">degree</label>
                <input v-model="std_degree" type="number" name="std_degree" class="form-control" placeholder="enter the degree">
                <span v-if="!std_degree" class="text-danger">ارجو تعبئة الحقل</span>
            </div>

            <div class=" form-group" style="margin-left: 16px;">
                <button type="button" @click="addStd()" :class="class_style">Save</button>
            </div>

        </div>

        <div class="row">
            <span>{{ reversedMessage }}</span>
        </div>

            <br>

            <hr>

            <div class="row">
                <h1>Axios</h1>
                <div v-for="user in users">
                    <span>name: {{ user.name }}</span>
                    <span>email: {{ user.email }}</span>
                </div>
            </div>

        <table class="table table-bordered" border="2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Std Name</th>
                    <th>Degree</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in std_names">
                        <td>{{ item['id'] }}</td>
                        <td>
                            {{ item.name }}
                        </td>
                        <td>
                            {{ item.degree }}
                        </td>
                        <td>
                            <button type="button" @click="edit_std(index)" class="btn btn-info">Edit</button>
                            <button type="button" @click="addStd()" class="btn btn-danger">Delete</button>
                        </td>
                </tr>
            </tbody>
        </table>
        <hr>

        <ul>
            <li v-for="value in std_names">
                <span style="color: blue;">
                {{ value.name }}
                </span>
                <span style="color:yellow;">
                {{ value.degree }}
                </span>
        </li>
        </ul>
            <hr>
    </div>
</template>

<script>
export default {
    data () {
                return {
                count: 0 ,
                std_name:null,
                std_degree:null,
                std_names: [],
                message: "",
                class_style:"btn btn-info",
                title:'button to plus',
                error: null,
                num :10,
                check: false,
                edit: false,
                index: null,
                msg_test: 'hello',
                users: [],
            }
        },

            mounted () {
                this.std_names = [
                {id: 1, name: 'ahmed', degree:50},
                {id: 2, name: 'mutasem', degree:50},
                {id: 3, name: 'noor', degree:50},
                {id: 4, name: 'leen', degree:50},
                ]
                console.log(this.users)
                this.getUsers()

            },

        props: {
          //  users: Array,
        },

        computed: {
            reversedMessage() {
               return this.msg_test = this.msg_test.split('').reverse().join('')
            }
        },

        watch: {
            std_degree(newVal) {
                if(newVal > 100) {
                    this.std_degree = 100
                }
            }
        },

            methods:{
                getUsers() {
                        axios.get('get_users')
                        .then(res => {
                            console.log(res.data.users)
                            this.users = res.data.users
                        }).catch(error => {
                            console.log(error)
                        })
                },

                plus(){
                    this.count += 2;
                },
                addStd(){
                    if(!this.edit) {
                        var last_item = this.std_names[this.std_names.length - 1]
                        const std = {
                            id: last_item.id+1 ,
                            name:this.std_name,
                            degree:this.std_degree
                        }
                        this.std_names.push(std)
                        this.class_style = "btn btn-dark"
                    }
                    else {
                        this.std_names[this.index].name = this.std_name
                        this.std_names[this.index].degree = this.std_degree
                        this.index = null
                        this.edit = false
                        this.std_name = null
                        this.std_degree = null
                    }
                },
                edit_std(index) {
                    this.std_name = this.std_names[index].name
                    this.std_degree = this.std_names[index].degree
                    this.edit = true
                    this.index = index
                }
            },
}
</script>
