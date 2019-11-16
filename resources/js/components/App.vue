<template>
    <div class="container">
        <p class="lighter">Lighter</p>
        <p class="regular">Regular</p>
        <p style="font-weight: 500">Medium</p>
        <p style="font-weight: 700">Bold</p>
        <p style="font-weight: 900">Black</p>
    </div>
</template>

<script>
export default {}
</script>

<style lang="scss">
.container {
    font-family: $font-family-sans-serif;
}

.lighter {
    font-weight: $font-lighter;
}

.regular {
    font-weight: $font-regular;
}
</style>
