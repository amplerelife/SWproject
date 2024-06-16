<template>
  <main>
    <div class="VisitFormContainer">
      <Carousel>
        <CarouselContent>
          <CarouselItem><VisitFormHeader ref="visitFormHeaderRef" /></CarouselItem>
          <CarouselItem><OffCampusRentalInformationForm ref="offCampusRentalInformationFormRef" /></CarouselItem>
          <CarouselItem><RentalSafetySelfManagement ref="rentalSafetySelfManagementRef" /></CarouselItem>
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
import { ref } from 'vue';
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
} from '@/components/ui/carousel';

const visitFormHeaderRef = ref(null);
const offCampusRentalInformationFormRef = ref(null);
const rentalSafetySelfManagementRef = ref(null);
const visitFormTeacherRef = ref(null);
const visitingResultRef = ref(null);

const formData = ref({
  visitFormHeader: {},
  offCampusRentalInformation: {},
  rentalSafetySelfManagement: {},
  visitFormTeacher: {},
  visitingResult: {},
});

const submit = () => {
  formData.value.visitFormHeader = visitFormHeaderRef.value?.getData() || {};
  formData.value.offCampusRentalInformation = offCampusRentalInformationFormRef.value?.getData() || {};
  formData.value.rentalSafetySelfManagement = rentalSafetySelfManagementRef.value?.getData() || {};
  formData.value.visitFormTeacher = visitFormTeacherRef.value?.getData() || {};
  formData.value.visitingResult = visitingResultRef.value?.getData() || {};

  // Handle form submission, e.g., send the formData to the server
  console.log('Form data:', formData.value);
};

const clear = () => {
  // Clear form data
  formData.value = {
    visitFormHeader: {},
    offCampusRentalInformation: {},
    rentalSafetySelfManagement: {},
    visitFormTeacher: {},
    visitingResult: {},
  };

  // Clear each component's data (assuming each component has a method to clear its data)
  visitFormHeaderRef.value?.clearData();
  offCampusRentalInformationFormRef.value?.clearData();
  rentalSafetySelfManagementRef.value?.clearData();
  visitFormTeacherRef.value?.clearData();
  visitingResultRef.value?.clearData();
};
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
