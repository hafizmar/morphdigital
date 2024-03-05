<template>
    <header-page :title="pageTitle" />
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <span>Task List</span>
                        <button class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#modalTask">Add Task</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <tr v-for="(task, index) in tasks" :key="index">
                                    <task :task="task" v-on:deletingTask="getAllTask()" v-on:updatingTask="showModalUpdate" />
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <modal-add v-on:addingTask="getAllTask()" />
        <modal-edit v-on:addingTask="getAllTask()" :taskid="this.edit.id" :taskname="this.edit.name" :taskdesc="this.edit.desc"/>
    </div>
</template>

<script>
import headerPage from "../partials/header.vue"
import task from "../partials/task.vue"
import modalAdd from "../partials/modal_add.vue"
import modalEdit from "../partials/modal_edit.vue"

export default {
    components: {
        headerPage,
        task,
        modalAdd,
        modalEdit,
    },
    data: function () {
        return {
            pageTitle: 'Task List',
            tasks: [],
            isUpdate: false,
            edit: {
                id: '',
                name: '',
                desc: ''
            }
        }
    },
    methods: {
        async getAllTask() {
            await axios.get('api/tasks')
                .then(response => {
                    this.tasks = response.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },
        async getTask(id) {
            await axios.get('api/task/' + id)
                .then(response => {
                    this.data.newTaskTitle = response.data.name
                    this.alert("Great mind thinks alike.", "Success!", "info");
                })
                .catch(error => {
                    console.log(error);
                })
        },
        showModalUpdate(id, name, desc) {
            this.edit.id = id;
            this.edit.name = name;
            this.edit.desc = desc;
        }
    },
    created() {
        this.getAllTask();
    }
}
</script>
<style lang="css">
@import "../../../../css/admin/app.css";
</style>