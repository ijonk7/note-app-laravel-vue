<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- <div v-if="successMessage" class="alert alert-success">
                    {{ successMessage }}
                </div> -->
                <div class="card">
                    <div class="card-header"><strong>Edit Note</strong></div>
                    <div class="card-body">
                        <form action="#" method="post" @submit.prevent="update">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" v-model="form.title" id="title" class="form-control">
                                <div v-if="theErrors.title" class="mt-2 text-danger">{{ theErrors.title[0] }}</div>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <select @change="selectedSubject" id="subject" class="form-control">
                                    <option :value="form.subjectId" v-text="form.subject"></option>
                                    <template v-for="subject in subjects">
                                        <option v-if="form.subjectId !== subject.id" :key="subject.id" :value="subject.id">{{ subject.name }}</option>
                                    </template>
                                </select>
                                <div v-if="theErrors.subject" class="mt-2 text-danger">{{ theErrors.subject[0] }}</div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea v-model="form.description" id="description" rows="5" class="form-control"></textarea>
                                <div v-if="theErrors.description" class="mt-2 text-danger">{{ theErrors.description[0] }}</div>
                            </div>

                            <div class="form-inline">
                                <button type="submit" class="btn btn-primary mr-sm-2">Update</button>
                                <router-link :to="{ name: 'notes.table' }">
                                    <button type="button" class="btn btn-secondary">Back</button>
                                </router-link>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: [],
            subjects: [],
            theErrors: [],
            selected: ''
        };
    },
    mounted() {
        this.getSubjects()
        this.getNote()
    },
    methods: {
        async getSubjects() {
            let response = await axios.get('/api/subjects')
                                            // console.log(response);
                                        .then((response) => {
                                            // handle success
                                            // console.log(response.data)
                                            this.subjects = response.data
                                        });
        },
        async getNote() {
            let response = await axios.get('/api/notes/' + this.$route.params.noteSlug)
                                            // console.log(response);
                                        .then((response) => {
                                            // handle success
                                            // console.log(response.data)
                                            this.form = response.data.data
                                            // console.log(this.form )
                                            // console.log(this.form.subjectId)
                                        });
        },
        selectedSubject(e) {
            // console.log(e.target.value)
            this.selected = e.target.value
        },
        async update() {
            this.form['subject'] = this.selected || this.form.subjectId
            // console.log(this.form)
            let response = await axios.put('/api/notes/' + this.$route.params.noteSlug + '/edit', this.form)
                                        .then((response) => {
                                            // handle success
                                            // console.log(response.data)

                                            this.$toasted.show(response.data.message, {
                                                type: 'success',
                                                duration: 3000
                                            })
                                            this.$router.push({name: 'notes.table'})
                                        })
                                        .catch((error) => {
                                            // console.log(error.response.data.errors)

                                            this.getNote()

                                            this.loading = false
                                            this.$toasted.show("Something went wrong", {
                                                type: 'error',
                                                duration: 3000
                                            })

                                            this.theErrors = error.response.data.errors

                                            // console.log(this.theErrors)

                                            // if (error.response.status == 422) {
                                            //     this.errors = error.response.data.errors
                                            // }
                                        });
        }
    },
}
</script>
