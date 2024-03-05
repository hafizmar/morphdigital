<template>
    <!-- Modal -->
    <div class="modal fade" id="modalTask" tabindex="-1" aria-labelledby="modalTaskTitle" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTaskTitle">Add New Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="pb-2">Title :</label>
                    <input v-model="data.newTaskTitle" type="text" name="add_task" class="form-control mb-2"
                        id="addTaskTitle">
                    <label class="pb-2">Description :</label>
                    <input v-model="data.newTaskDesc" type="text" name="add_task" class="form-control mb-2"
                        id="addTaskDesc">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        @click="closingModal()">Close</button>
                    <button type="button" class="btn btn-primary" id="modalBtn" @click="addTask()">Add Task</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: () => {
        return {
            data: {
                newTaskTitle: '',
                newTaskDesc: '',
            },
        }
    },
    methods: {
        addTask() {
            if (this.data.newTaskTitle.trim() == '' || this.data.newTaskDesc.trim() == '') return this.alert("Text field cannot be empty.", "Woops!", "danger");

            axios.post('api/task/store', {
                task: {
                    name: this.data.newTaskTitle,
                    desc: this.data.newTaskDesc,
                }
            }).then(response => {
                this.alert("Great mind thinks alike.", "Success!", "success");
                this.$emit('addingTask');
                $('#modalTask').modal('toggle');
                this.closingModal();
            }).catch(error => {
                console.log(error);
            })
        },
        closingModal() {
            setTimeout(() => {
                this.data.newTaskTitle = '';
                this.data.newTaskDesc = '';
                $('#addTaskTitle').val('');
                $('#addTaskDesc').val('');
            }, 300);
        }
    }
}
</script>