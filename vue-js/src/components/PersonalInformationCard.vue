<script setup>
import { ref } from 'vue'

const student = ref({
  accountName: '',
  password: '',
  studentId: '',
  email: '',
  chineseName: '',
  englishName: '',
  department: '',
  gender: '',
  phone: '',
  teacher: '',
  address: '',
  homePhone: '',
  homeContact: ''
})

const teacher = ref({
  accountName: '',
  password: '',
  teacherId: '',
  email: '',
  chineseName: '',
  englishName: '',
  position: '',
  gender: '',
  phone: '',
  office: '',
  officePhone: ''
})

const landlord = ref({
  accountName: '',
  password: '',
  email: '',
  chineseName: '',
  englishName: '',
  position: '',
  gender: '',
  phone: '',
  address: ''
})

const administrator = ref({
  accountName: '',
  password: '',
  email: '',
  chineseName: '',
  englishName: '',
  gender: '',
  phone: ''
})

const submit = () => {
  const data = {
    student: student.value,
    teacher: teacher.value,
    landlord: landlord.value,
    administrator: administrator.value
  }

  fetch('/asss', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then((response) => response.json())
    .then((result) => {
      console.log(result)
      alert('Submitted successfully!')
    })
    .catch((error) => {
      console.error('Error:', error)
    })
}

const clear = () => {
  student.value = {
    accountName: '',
    password: '',
    studentId: '',
    email: '',
    chineseName: '',
    englishName: '',
    department: '',
    gender: '',
    phone: '',
    teacher: '',
    address: '',
    homePhone: '',
    homeContact: ''
  }
  teacher.value = {
    accountName: '',
    password: '',
    teacherId: '',
    email: '',
    chineseName: '',
    englishName: '',
    position: '',
    gender: '',
    phone: '',
    office: '',
    officePhone: ''
  }
  landlord.value = {
    accountName: '',
    password: '',
    email: '',
    chineseName: '',
    englishName: '',
    position: '',
    gender: '',
    phone: '',
    address: ''
  }
  administrator.value = {
    accountName: '',
    password: '',
    email: '',
    chineseName: '',
    englishName: '',
    gender: '',
    phone: ''
  }
}
</script>

<template>
  <div class="PersonalInformationContainer">
    <div class="Student">
      <p>賬號名字：<input type="text" v-model="student.accountName" /></p>
      <p>密碼：<input type="text" v-model="student.password" /></p>
      <p>學號：<input type="text" v-model="student.studentId" /></p>
      <p>電子郵件信箱：<input type="text" v-model="student.email" /></p>
      <p>中文姓名：<input type="text" v-model="student.chineseName" /></p>
      <p>英文姓名：<input type="text" v-model="student.englishName" /></p>
      <p>系級：<input type="text" v-model="student.department" /></p>
      <p>
        性別：
        <input
          type="radio"
          id="Male"
          name="GenderStudent"
          value="Male"
          v-model="student.gender"
          style="width: 10vh"
        />
        <label for="Male">男</label>
        <input
          type="radio"
          id="Female"
          name="GenderStudent"
          value="Female"
          v-model="student.gender"
          style="width: 10vh"
        />
        <label for="Female">女</label>
      </p>
      <p>電話號碼：<input type="text" v-model="student.phone" /></p>
      <p>所屬老師：<input type="text" v-model="student.teacher" /></p>
      <p>地址：<input type="text" v-model="student.address" /></p>
      <p>住家電話：<input type="text" v-model="student.homePhone" /></p>
      <p>住家聯絡人：<input type="text" v-model="student.homeContact" /></p>
    </div>
    <div class="Teacher">
      <p>賬號名字：<input type="text" v-model="teacher.accountName" /></p>
      <p>密碼：<input type="text" v-model="teacher.password" /></p>
      <p>教師號：<input type="text" v-model="teacher.teacherId" /></p>
      <p>電子郵件信箱：<input type="text" v-model="teacher.email" /></p>
      <p>中文姓名：<input type="text" v-model="teacher.chineseName" /></p>
      <p>英文姓名：<input type="text" v-model="teacher.englishName" /></p>
      <p>職別：<input type="text" v-model="teacher.position" /></p>
      <p>
        性別：
        <input
          type="radio"
          id="MaleTeacher"
          name="GenderTeacher"
          value="Male"
          v-model="teacher.gender"
          style="width: 10vh"
        />
        <label for="MaleTeacher">男</label>
        <input
          type="radio"
          id="FemaleTeacher"
          name="GenderTeacher"
          value="Female"
          v-model="teacher.gender"
          style="width: 10vh"
        />
        <label for="FemaleTeacher">女</label>
      </p>
      <p>電話號碼：<input type="text" v-model="teacher.phone" /></p>
      <p>辦公室：<input type="text" v-model="teacher.office" /></p>
      <p>辦公室電話：<input type="text" v-model="teacher.officePhone" /></p>
    </div>
    <div class="Landlord">
      <p>賬號名字：<input type="text" v-model="landlord.accountName" /></p>
      <p>密碼：<input type="text" v-model="landlord.password" /></p>
      <p>電子郵件信箱：<input type="text" v-model="landlord.email" /></p>
      <p>中文姓名：<input type="text" v-model="landlord.chineseName" /></p>
      <p>英文姓名：<input type="text" v-model="landlord.englishName" /></p>
      <p>職別：<input type="text" v-model="landlord.position" /></p>
      <p>
        性別：
        <input
          type="radio"
          id="MaleLandlord"
          name="GenderLandlord"
          value="Male"
          v-model="landlord.gender"
          style="width: 10vh"
        />
        <label for="MaleLandlord">男</label>
        <input
          type="radio"
          id="FemaleLandlord"
          name="GenderLandlord"
          value="Female"
          v-model="landlord.gender"
          style="width: 10vh"
        />
        <label for="FemaleLandlord">女</label>
      </p>
      <p>電話號碼：<input type="text" v-model="landlord.phone" /></p>
      <p>地址：<input type="text" v-model="landlord.address" /></p>
    </div>
    <div class="Administrator">
      <p>賬號名字：<input type="text" v-model="administrator.accountName" /></p>
      <p>密碼：<input type="text" v-model="administrator.password" /></p>
      <p>電子郵件信箱：<input type="text" v-model="administrator.email" /></p>
      <p>中文姓名：<input type="text" v-model="administrator.chineseName" /></p>
      <p>英文姓名：<input type="text" v-model="administrator.englishName" /></p>
      <p>
        性別：
        <input
          type="radio"
          id="MaleAdmin"
          name="GenderAdmin"
          value="Male"
          v-model="administrator.gender"
          style="width: 10vh"
        />
        <label for="MaleAdmin">男</label>
        <input
          type="radio"
          id="FemaleAdmin"
          name="GenderAdmin"
          value="Female"
          v-model="administrator.gender"
          style="width: 10vh"
        />
        <label for="FemaleAdmin">女</label>
      </p>
      <p>電話號碼：<input type="text" v-model="administrator.phone" /></p>
    </div>

    <div class="form-actions">
      <button @click="submit" class="btn btn-primary">Submit</button>
      <button @click="clear" class="btn btn-secondary">Clear</button>
    </div>
  </div>
</template>

<style scoped>
.PersonalInformationContainer {
  width: 50vw;
  align-items: center;
  font-size: 2vw;
  color: white;
  padding: 10%;
  background-color: var(--vt-c-divider-dark-2);
  margin: 0 auto;
  margin-top: 2%;
  border-radius: 5%;

  & label {
    margin-right: 4vw;
  }

  & p {
    text-align: right;
  }

  .Student,
  .Teacher,
  .Landlord,
  .Administrator {
    display: none;
  }

  .Student {
    display: block;
  }

  .Student.active,
  .Teacher.active,
  .Landlord.active,
  .Administrator.active {
    display: block;
  }

  input {
    margin: 1vh;
    color: black;
  }

  .form-actions {
    display: flex;
    justify-content: space-between;
  }
}
</style>
