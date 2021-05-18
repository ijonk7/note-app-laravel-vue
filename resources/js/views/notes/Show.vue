<template>
<div class="container">
    <div class="card text-white bg-primary mb-3">
        <div class="card-header">
            <h1>{{ note.title }}</h1>
        </div>

        <!-- <hr> -->

        <div class="card-body">

            <div class="card-title">
                <em>{{ note.published }} - {{ note.subject }}</em>
            </div>

            <div class="card-text">
                {{ note.description }}
            </div>

        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            note: []
        };
    },
    mounted() {
        // console.log(this.$route.params.noteSlug)
        this.getNote()
    },
    methods: {
        async getNote() {
            let response = await axios.get('/api/notes/' + this.$route.params.noteSlug)
                                            // console.log(response);
                                        .then((response) => {
                                            // handle success
                                            // console.log(response.data)
                                            this.note = response.data.data
                                        });
        },
    }
}
</script>
