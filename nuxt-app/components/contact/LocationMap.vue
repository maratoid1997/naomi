<template>
    <client-only>
        <yandex-map
            :zoom="13"
            :coords="coords"
            :controls="[]"
        >
            <ymap-marker :coords="coords" marker-id="1" />
        </yandex-map>
    </client-only>
</template>

<script>
export default {
    data() {
        return {
            coords: [40.382611439697484, 49.89518360275937],
        }
    }
}
</script>