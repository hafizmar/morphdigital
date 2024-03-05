<template>
    <!-- Modal -->
    <div class="modal fade" id="modalEditTask" tabindex="-1" aria-labelledby="modalEditTaskTitle" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEditTaskTitle">Edit Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="pb-2">Title :</label>
                    <input type="text" name="title" class="form-control mb-2" id="editTaskTitle">
                    <label class="pb-2">Description :</label>
                    <input type="text" name="desc" class="form-control mb-2" id="editTaskDesc">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        @click="closingModal()">Close</button>
                    <button type="button" class="btn btn-primary" id="modalBtn" @click="updateTask()">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['taskid', 'taskname', 'taskdesc'],
    data: () => {
        return {
            data: {
                taskId: '',
                taskName: '',
                taskDesc: '',
            },
        }
    },
    methods: {
        updateTask() {
            this.data.taskId = this.taskid;
            this.data.taskName = $('#editTaskTitle').val();
            this.data.taskDesc = $('#editTaskDesc').val();

            if (this.data.taskName.trim() == '' || this.data.taskDesc.trim() == '') return this.alert("Text field cannot be empty.", "Woops!", "danger");
            axios.put('api/task/' + this.data.taskId, {
                task: {
                    name: this.data.taskName,
                    desc: this.data.taskDesc,
                    status: 0,
                }
            }).then(response => {
                this.alert("Great mind thinks alike.", "Success!", "success");
                this.$emit('addingTask');
            }).catch(error => {
                console.log(error);
            })
        },
        closingModal() {
            setTimeout(() => {
                this.data.taskName = '';
                this.data.taskDesc = '';
                $('#editTaskTitle').val('');
                $('#EditTaskDesc').val('');
                $('#modalTaskTitle').text('Add New Task');
                $('#modalBtn').text('Add Task');
            }, 300);
        }
    },
}
</script>