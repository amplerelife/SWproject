<template>
  <main>
    <div class="VisitFormContainer">
      <Carousel>
        <CarouselContent>
          <CarouselItem><VisitFormHeader ref="visitFormHeaderRef" /></CarouselItem>
          <CarouselItem
            ><OffCampusRentalInformationForm ref="offCampusRentalInformationFormRef"
          /></CarouselItem>
          <CarouselItem
            ><RentalSafetySelfManagement ref="rentalSafetySelfManagementRef"
          /></CarouselItem>
          <CarouselItem><VisitFormTeacher ref="visitFormTeacherRef" /></CarouselItem>
          <CarouselItem><VisitingResult ref="visitingResultRef" /></CarouselItem>
        </CarouselContent>
        <CarouselNext></CarouselNext>
        <CarouselPrevious></CarouselPrevious>
      </Carousel>
    </div>
    <div class="form-actions">
      <button @click="submit" class="btn btn-primary">Submit</button>
      <button @click="clear" class="btn btn-secondary">Clear</button>
    </div>
  </main>
</template>

<script setup>
import { useRoute, RouterLink } from 'vue-router';
import { ref, computed , onMounted } from 'vue';
import axios from 'axios';
import VisitFormHeader from '@/components/VisitingFormComponent/VisitFormHeader.vue';
import OffCampusRentalInformationForm from '@/components/VisitingFormComponent/OffCampusRentalInformationForm.vue';
import RentalSafetySelfManagement from '@/components/VisitingFormComponent/RentalSafetySelfManagement.vue';
import VisitFormTeacher from '@/components/VisitingFormComponent/AnalysisingEnvironmentAndBehavior.vue';
import VisitingResult from '@/components/VisitingFormComponent/VisitingResult.vue';
import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious
} from '@/components/ui/carousel'

const visitFormHeaderRef = ref(null)
const offCampusRentalInformationFormRef = ref(null)
const rentalSafetySelfManagementRef = ref(null)
const visitFormTeacherRef = ref(null)
const visitingResultRef = ref(null)

const formData = ref({
  visitFormHeader: {},
  offCampusRentalInformation: {},
  rentalSafetySelfManagement: {},
  visitFormTeacher: {},
  visitingResult: {}
})

async function submit (){
  formData.value.visitFormHeader = visitFormHeaderRef.value?.getData() || {};
  formData.value.offCampusRentalInformation = offCampusRentalInformationFormRef.value?.getData() || {};
  formData.value.rentalSafetySelfManagement = rentalSafetySelfManagementRef.value?.getData() || {};
  formData.value.visitFormTeacher = visitFormTeacherRef.value?.getData() || {};

  formData.value.visitingResult = visitingResultRef.value?.getData() || {};

  // Handle form submission, e.g., send the formData to the server
  console.log('Form data:', formData.value);

  const data_student = {
    "usertype": "student", 
    "student_id": "A1105501", 
    "landlord_name": formData.value.offCampusRentalInformation.landlord_name,
    "landlord_phone": formData.value.offCampusRentalInformation.landlord_phone,
    "address": formData.value.offCampusRentalInformation.address,
    "build_type": formData.value.offCampusRentalInformation.build_type,
    "room_type": formData.value.offCampusRentalInformation.room_type,
    "rent": formData.value.offCampusRentalInformation.rent,
    "deposit": formData.value.offCampusRentalInformation.deposit,
    "recommend": formData.value.offCampusRentalInformation.recommend,
    "WoodOrIron": formData.value.rentalSafetySelfManagement.WoodOrIron,
    "alarm":  formData.value.rentalSafetySelfManagement.alarm,
    "escapeRoute": formData.value.rentalSafetySelfManagement.escapeRoute,
    "doorLock": formData.value.rentalSafetySelfManagement.doorLock,
    "light": formData.value.rentalSafetySelfManagement.FlashFlashlightOKOK,
    "circuitSafe": formData.value.rentalSafetySelfManagement.circuitSafe,
    "knowPhone": formData.value.rentalSafetySelfManagement.knowPhone,
     "multiSocket": formData.value.rentalSafetySelfManagement.multiSocket, 
     "extinguisher": formData.value.rentalSafetySelfManagement.extinguisher,
     "heater": formData.value.rentalSafetySelfManagement.heater, 
     "multiRoomBed": formData.value.rentalSafetySelfManagement.multiRoomBed,
     "monitor": formData.value.rentalSafetySelfManagement.monitor,
    "contract": formData.value.rentalSafetySelfManagement.contract
  };

  const data_teacher = {
    "usertype": "teacher", 
    "visitform_id": "01", 
    "request_rent": 1, 
    "bills": formData.value.visitFormTeacher.waterAndElectricityCharges, 
    "enviroment": 2,
    "enviroment_reason":formData.value.visitFormTeacher.enviroment_reason,
    "live_enviroment": formData.value.visitFormTeacher.live_enviroment,
    "live_enviroment_reason": formData.value.visitFormTeacher.live_enviroment_reason,
    "now":  formData.value.visitFormTeacher.now,
    "now_reason": formData.value.visitFormTeacher.now_reason,
    "relationship": formData.value.visitFormTeacher.relationship,
    "visitResult": formData.value.visitingResult.visitResult,
    "visitResult_reason": formData.value.visitingResult.visitResult_reason,
    "other": formData.value.visitingResult.otherVisitResult,
    "care": 1 ,
    "care_reason": formData.value.visitingResult.careReason
  };
  console.log('Form student:',data_student)
  console.log('Form student:',data_teacher)
  try {
    const response = await axios.post('/api/form/Fill', data_student);
    console.log('Response:', response.data);
    alert(`Success: ${response.data.message}`);
  } catch (error) {
    console.error('There was an error!', error);
    alert('An error occurred while submitting the data.');
  }
};

const clear = () => {
  // Clear form data
  formData.value = {
    visitFormHeader: {},
    offCampusRentalInformation: {},
    rentalSafetySelfManagement: {},
    visitFormTeacher: {},
    visitingResult: {}
  }

  // Clear each component's data (assuming each component has a method to clear its data)
  visitFormHeaderRef.value?.clearData()
  offCampusRentalInformationFormRef.value?.clearData()
  rentalSafetySelfManagementRef.value?.clearData()
  visitFormTeacherRef.value?.clearData()
  visitingResultRef.value?.clearData()
}
</script>

<style scoped>
.VisitFormContainer {
  margin: 0 auto;
  align-items: center;
  width: 80vw;
  max-width: 80vw;
  padding: 5%;
  border-radius: 1.5rem;
  background-color: var(--color-accent-mute);
}

.form-actions {
  display: flex;
  justify-content: space-between;
}

.btn {
  padding: 10px 20px;
  font-size: 16px;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
  color: white;
}

.btn-secondary {
  background-color: #6c757d;
  border-color: #6c757d;
  color: white;
}
</style>
