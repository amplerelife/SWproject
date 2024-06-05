<script setup>

</script>

<template>
        <div class="UserInputContainer">
            <h2>Login</h2>
                <p>UserName:<input type="text"></p>
                <p>PassWord:<input type="password"></p>
        </div>
</template>

<style scoped>

.UserInputContainer{
    display:inline-block;
    background-image: linear-gradient(red, yellow);
    border-radius: 5%;
    color:black;
    font-family: 'Courier New', Courier, monospace;
    font-size:2vw;
    text-align:center;
    padding:5vw;

    input{
        margin:1vh;
        color:black;
    }
    

    & h2{
        font-weight: bold;
        font-size:3vw;
    }
}
    

</style>    