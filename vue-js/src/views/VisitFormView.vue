<script setup>
  import VisitFormHeader from '@/components/VisitFormHeader.vue';
  import OffCampusRentalInformationForm from '@/components/OffCampusRentalInformationForm.vue';
  import RentalSafetySelfManagement from '@/components/RentalSafetySelfManagement.vue';
  import VisitFormTeacher from '@/components/VisitFormTeacher.vue';
</script>

<template>

    <main>
        <VisitFormHeader></VisitFormHeader>
        <div class="VisitFormContainer">
          <OffCampusRentalInformationForm></OffCampusRentalInformationForm>
          <RentalSafetySelfManagement></RentalSafetySelfManagement>
          <VisitFormTeacher></VisitFormTeacher>
        </div>
    </main>

</template>

<style scoped>
.VisitFormContainer{
  text-align: center;
}
</style>