<template>
    <div class="feed">
        <ul>
            <li v-for="i in num" :key="i"> <div class="card-body shadow-sm">i am a fool</div></li>
        </ul>
    </div>
</template>

<script>
export default {
    data:()=>(
        {
            num:20000,
        }
    ),
}
</script>

<style>
.feed{
    height:70vh;
    background-color: rgb(225, 241, 255);
    overflow-y: scroll;
}
</style>
