<template>
  <div class="container">

      <div class="messanger">
             <i class="icofont icofont-ui-messaging icon" ></i><div class="counter">0</div>
      </div>



  </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>
.icon{
    height: 2rem;
    width: 2rem;
padding-top:3px ;
    color:white;
    font-size: 2rem;
}
.messanger{
    position:fixed;
    top:88vh;
    left: 90vw;
    bottom: 10vh;
    z-index: 2000;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 4rem;
    width: 4rem;
    border-radius: 50%;
    background-color: #f5d730;
}
.counter{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 1rem;
    width: 1rem;
    border-radius: 50%;
    background-color: #ce1104;
    color: wheat;
    margin-bottom: 1rem;
    margin-left: -.5rem;

}
</style>

