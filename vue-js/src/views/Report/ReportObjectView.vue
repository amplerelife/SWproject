<script setup>
</script>
<template>
    <div class="text-area-component">
        <div class="form-group">
            <label for="director">Reporter:</label>
            <input id="director" v-model="director" rows="3" class="form-control" disabled></input>
        </div>
        <div class="form-group">
            <label for="text">Report Content:</label>
            <br />
            <textarea id="ReportText" v-model="ReportText" cols="30" rows="5" class="form-control" disabled></textarea>
        </div>
        <div class="form-group">
            <label for="text">Respond:</label>
            <br />
            <textarea id="RespondText" v-model="RespondText" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-actions">
            <button @click="submit" class="btn btn-primary">Submit</button>
            <button @click="clear" class="btn btn-secondary">Clear</button>
        </div>
        </div>
</template>

<script>
  export default {
    data() {
      return {
        director: ' A1105537',
        ReportText: 'You are son of your mother',
        RespondText: 'gaga',
        currentDate: this.getCurrentDate()
      };
    },
    methods: {
      getCurrentDate() {
        const date = new Date();
        return date.toLocaleDateString();
      },
      submit() {
        console.log('Director:', this.director);
        console.log('ReportText:', this.ReportText);
        console.log('RespondText:', this.RespondText);
        alert(`Director: ${this.director}\nReportText: ${this.Reporttext}\nRespondText: ${this.Respondtext}`);
      },
      clear() {
        this.RespondText = '';
      }
    }
  };
</script>

<style scoped>
.text-area-component {
    color:black;
    max-width: 600px;
    margin: auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 1.5rem;
    background-color: var(--color-accent-mute);
    font-size:18px;
}

.current-date {
  font-size: 16px;
  margin-bottom: 10px;
  font-weight: bold;
}

.form-group {
margin-bottom: 15px;
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
