<template>
    <button ref="deleteNote" @click="destroyNote" class="btn btn-danger">Delete</button>
</template>

<script>
export default {
    props: ['endpoint'],
    methods: {
        async destroyNote() {
            let q = window.confirm("Are you sure ?")

            if (q == true) {
                // console.log(this.endpoint)
                let response = await axios.delete('/api/notes/' + this.endpoint + '/delete')
                                            .then((response) => {
                                                // handle success
                                                // console.log(response.data)
                                                this.$toasted.show(response.data.message, {
                                                    type: 'success',
                                                    duration: 3000
                                                })
                                                // console.log(this.$refs.deleteNote.parentNode.parentNode.remove())
                                                this.$refs.deleteNote.parentNode.parentNode.remove()
                                            });
            }
        },
    },
}
</script>
