<script setup>
import { ref } from 'vue';
import VisitFormHeader from '@/components/VisitingFormComponent/VisitFormHeader.vue'
import OffCampusRentalInformationForm from '@/components/VisitingFormComponent/OffCampusRentalInformationForm.vue'
import RentalSafetySelfManagement from '@/components/VisitingFormComponent/RentalSafetySelfManagement.vue'
import VisitFormTeacher from '@/components/VisitingFormComponent/AnalysisingEnvironmentAndBehavior.vue'
import VisitingResult from '@/components/VisitingFormComponent/VisitingResult.vue'

import {
  Carousel,
  CarouselContent,
  CarouselItem,
  CarouselNext,
  CarouselPrevious
} from '@/components/ui/carousel'


const visitFormHeaderRef = ref(null);
const offCampusRentalInformationFormRef = ref(null);
const rentalSafetySelfManagementRef = ref(null);
const visitFormTeacherRef = ref(null);
const visitingResultRef = ref(null);

</script>

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

<script>
export default {
  data() {
    return {
      formData: {
        visitFormHeader: {},
        offCampusRentalInformation: {},
        rentalSafetySelfManagement: {},
        visitFormTeacher: {},
        visitingResult: {},
      },
    };
  },
  methods: {
    submit() {
      this.formData.visitFormHeader = this.$refs.visitFormHeaderRef?.getData() || {};
      this.formData.offCampusRentalInformation = this.$refs.offCampusRentalInformationFormRef?.getData() || {};
      this.formData.rentalSafetySelfManagement = this.$refs.rentalSafetySelfManagementRef?.getData() || {};
      this.formData.visitFormTeacher = this.$refs.visitFormTeacherRef?.getData() || {};
      this.formData.visitingResult = this.$refs.visitingResultRef?.getData() || {};

      // Handle form submission, e.g., send the formData to the server
      console.log('Form data:', this.formData);
    },
    clear() {
      // Clear form data and reset components if needed
      this.formData = {
        visitFormHeader: {},
        offCampusRentalInformation: {},
        rentalSafetySelfManagement: {},
        visitFormTeacher: {},
        visitingResult: {},
      };

      // Clear each component's data (assuming each component has a method to clear its data)
      this.$refs.visitFormHeaderRef?.clearData();
      this.$refs.offCampusRentalInformationFormRef?.clearData();
      this.$refs.rentalSafetySelfManagementRef?.clearData();
      this.$refs.visitFormTeacherRef?.clearData();
      this.$refs.visitingResultRef?.clearData();
    },
  },
};
</script>

<style scoped>
.VisitFormContainer {
  margin : 0 auto;
  align-items: center;
  width:80vw;
  max-width:80vw;
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
