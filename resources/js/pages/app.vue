<template>
    <div>
        <h1>Vue Router Demo App</h1>

        <p>
            <router-link :to="{ name: 'home' }">Home</router-link> |
            <router-link :to="{ name: 'add' }">add</router-link>
        </p>

        <div class="container">
        </div>
    </div>
</template>
<script>
    export default {}
</script>
