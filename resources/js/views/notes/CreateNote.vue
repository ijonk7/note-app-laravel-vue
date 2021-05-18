<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- <div v-if="successMessage" class="alert alert-success">
                    {{ successMessage }}
                </div> -->
                <div class="card">
                    <div class="card-header"><strong>New Note</strong></div>
                    <div class="card-body">
                        <form action="#" method="post" @submit.prevent="store">
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" v-model="form.title" id="title" class="form-control">
                                <div v-if="theErrors.title" class="mt-2 text-danger">{{ theErrors.title[0] }}</div>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <select v-model="form.subject" id="subject" class="form-control">
                                    <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
                                        {{ subject.name }}</option>
                                </select>
                                <div v-if="theErrors.subject" class="mt-2 text-danger">{{ theErrors.subject[0] }}</div>
                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea v-model="form.description" id="description" rows="5"
                                    class="form-control"></textarea>
                                <div v-if="theErrors.description" class="mt-2 text-danger">{{ theErrors.description[0] }}
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary d-flex align-items-center">
                                Save
                                <template v-if="loading">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        style="margin: auto; background: transparent; display: block; shape-rendering: auto;"
                                        width="30px" height="20px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                        <g transform="rotate(0 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.9166666666666666s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(30 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.8333333333333334s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(60 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.75s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(90 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.6666666666666666s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(120 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.5833333333333334s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(150 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.5s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(180 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.4166666666666667s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(210 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.3333333333333333s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(240 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.25s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(270 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.16666666666666666s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(300 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="-0.08333333333333333s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <g transform="rotate(330 50 50)">
                                            <rect x="47" y="24" rx="3" ry="6" width="6" height="12" fill="#fef9fa">
                                                <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="1s"
                                                    begin="0s" repeatCount="indefinite"></animate>
                                            </rect>
                                        </g>
                                        <!-- [ldio] generated by https://loading.io/ -->
                                    </svg>
                                </template>
                            </button>

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
                form: {
                    title: '',
                    subject: '',
                    description: ''
                },
                loading: false,
                subjects: [],
                theErrors: []
            };
        },
        mounted() {
            this.getSubjects();
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
            async store() {
                this.loading = true
                let response = await axios.post('/api/notes/create-new-note', this.form)
                    // console.log(response);
                    .then((response) => {
                        // handle success
                        // console.log(response.data)
                        this.form.title = ""
                        this.form.subject = ""
                        this.form.description = ""
                        this.theErrors = []
                        // this.successMessage = response.data.message

                        this.loading = false
                        this.$toasted.show(response.data.message, {
                            type: 'success',
                            duration: 3000
                        })

                        this.$router.push({name: 'notes.table'})
                    })
                    .catch((error) => {
                        // console.log(error.response.data.errors)

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
