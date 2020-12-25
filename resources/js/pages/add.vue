      <template>
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
                    <option value="انتاج">انتاج</option>
                    <option value="ادارة">ادارة</option>
                    <option value="مالية">مالية</option>
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
                <button type="button" @click="addStd()" class="btn btn-info">Save</button>
                <button type="button" @click="totalUnless()" class="btn btn-info">calc net_salary</button>
                <button type="button" class="btn btn-info"><a href="/">back</a></button>
            </div>

        </div>
</template>


<script>
export default {
    data () {
                return {
                human_id:null,
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
                option_usr: "انتاج",
                item: {}
            }
        },

            mounted () {
                console.log(this.$route.query)
                this.getUsers()
            },

            methods:{

                getUsers() {
                        axios.get('get_users')
                        .then(res => {
                            console.log(res.data.data)
                          if(this.$route.query.edit) {
                              const item = res.data.data.filter(data => data.id == this.$route.query.id)[0]
                                this.name = item.name
                                this.num = item.num
                                this.section = item.section
                                this.salary = item.salary
                                this.discounts = item.discounts
                                this.net_salary = item.net_salary
                                this.edit = true;
                            }
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
                        this.class_style = "btn btn-dark"
                        axios.post(`add_user`, {
                            name: this.name,
                            num: this.num,
                            section:this.option_usr,
                            salary:this.salary,
                            discounts:this.discounts,
                            net_salary:this.net_salary
                        })
                        window.alert('saved info')
                    }
                    else {
                        axios.post(`edit_user/`+this.$route.query.id , {
                            name: this.name,
                            num: this.num,
                            section:this.section,
                            salary:this.salary,
                            discounts:this.discounts,
                            net_salary:this.net_salary
                        })
                        window.alert('تم التعديل')

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

