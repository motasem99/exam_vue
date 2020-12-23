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
                <input v-model="section" type="text" name="num" class="form-control" placeholder="enter the section" required />
                <span v-if="!section" class="text-danger">ارجو تعبئة الحقل</span>
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
                <input v-model="net_salary" type="number" name="num" class="form-control" placeholder="enter the net_salary" required />
                <span v-if="!net_salary" class="text-danger">ارجو تعبئة الحقل</span>
            </div>

            <div class=" form-group" style="margin-left: 16px;">
                <button type="button" @click="addStd()" :class="class_style">Save</button>
            </div>

        </div>
</template>
