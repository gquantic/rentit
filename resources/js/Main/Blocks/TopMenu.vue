<template>
    <header>
        <div class="logo">rentiT</div>
        <div class="description">Что арендуем?</div>
        <div class="search-form">
            <input type="text" placeholder="Sony ps5">
            <button class="search" @click="search">Поиск</button>
        </div>
    </header>
</template>

<script>
export default {
    methods: {
        search() {
            console.log(1);
        }
    },
}
</script>
