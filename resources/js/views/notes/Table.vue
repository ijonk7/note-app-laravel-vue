<template>
    <div class="container">
        <h3><strong>List Note</strong></h3>
        <table class="table">
            <thead>
                <tr>
                    <th>itle</th>
                    <th>Subject</th>
                    <th>Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="note in notes" :key="note.id">
                    <td><router-link :to="{ name: 'notes.show', params: { noteSlug: note.slug }}">{{ note.title }}</router-link></td>
                    <td>{{ note.subject }}</td>
                    <td>{{ note.published }}</td>
                    <td>
                        <router-link :to="{ name: 'notes.edit', params: { noteSlug: note.slug }}">
                            <button type="button" class="btn btn-primary">
                                Edit
                            </button>
                        </router-link>
                        <delete-note :endpoint="note.slug"></delete-note>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import DeleteNote from "./Delete.vue";

export default {
    components: {
        DeleteNote
    },
    data() {
        return {
            notes: [],
        };
    },
    mounted() {
        this.getNotes()
    },
    methods: {
        async getNotes() {
            let response = axios.get('/api/notes')
                                    // console.log(response);
                                .then((response) => {
                                    // handle success
                                    // console.log(response)
                                    // console.log(response.data.data)
                                    this.notes = response.data.data
                                });
        },
    },
}
</script>
