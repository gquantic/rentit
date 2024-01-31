<template>
    <h3 class="block-title">Объявления</h3>
    <div class="products">
        <a class="product" :href="product.route" v-for="product in products">
            <div class="product-image">
                <img :src="product.img" alt="">
            </div>
            <h4 class="title">{{ product.title }}</h4>
            <div class="prices">
                <!--            <template v-for="(price, index) in product.prices">-->
                <!--                <span>{{ index }} дн. / {{ price}}</span>-->
                <!--                <br>-->
                <!--            </template>-->
                <b class="prices">{{ Math.min(...product.prices) }} руб. / сутки</b>
            </div>
        </a>
    </div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
        }
    },
    props: ['show'],
    mounted() {
        console.log(1);

        axios.get('/api/products')
            .then(response => {
                console.log(response)
                this.products = response.data.data;
            });
    },
}
</script>
