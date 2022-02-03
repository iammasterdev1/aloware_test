<template>
    <main>

        <header-component />
        <Article-component :article="article" />

    </main>
</template>
<script>

export default {
    props: ['article'] ,
    data() {

    }
};
</script>
<style>
main{
    margin: 0 auto;
    max-width: 970px;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    direction: ltr;
}
</style>
