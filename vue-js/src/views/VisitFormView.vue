<script setup>
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
</script>

<template>
  <main>
    <VisitFormHeader></VisitFormHeader>
    <div class="content">
      <div class="leftsidenavigator" style="color: black">
        <p><a href="#111" style="color: red">this is 1</a></p>
        <p><a href="#222" style="color: red">this is 2</a></p>
        <p><a href="#333" style="color: red">this is 3</a></p>
        <p><a href="#444" style="color: red">this is 4</a></p>
      </div>
      <div class="VisitFormContainer">
        <Carousel>
          <CarouselContent>
            <CarouselItem
              ><OffCampusRentalInformationForm></OffCampusRentalInformationForm
            ></CarouselItem>
            <CarouselItem><RentalSafetySelfManagement></RentalSafetySelfManagement></CarouselItem>
            <CarouselItem><VisitFormTeacher></VisitFormTeacher></CarouselItem>
            <CarouselItem><VisitingResult></VisitingResult></CarouselItem>
          </CarouselContent>
          <CarouselNext></CarouselNext>
          <CarouselPrevious></CarouselPrevious>
        </Carousel>
      </div>
    </div>
  </main>
</template>

<style scoped>
.content {
  display: grid;
  grid-template-columns: 18% 78%;
  grid-template-areas: 'leftsidenavigator VisitFormContainer';
}
.VisitFormContainer {
  text-align: center;
}
</style>
