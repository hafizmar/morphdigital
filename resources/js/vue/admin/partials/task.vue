<template>
    <td><input type="checkbox" @click="updateStatus(task)" :checked="task.status ? true : false" /></td>
    <td><span>{{ task.name }}</span></td>
    <td><span>{{ task.desc }}</span></td>
    <td><span :class="[task.status ? 'text-success' : 'text-danger', '']">{{ task.status ? 'Completed' : 'Ongoing' }}</span>
    </td>
    <td>
        <a @click="editTask()" class="btn-edit edit" data-bs-toggle="modal"
            data-bs-target="#modalEditTask"><font-awesome-icon icon="pen-to-square" /></a>
        <a @click="deleteTask()" class="btn-edit delete"><font-awesome-icon icon="trash" /></a>
    </td>
</template>

<script>

export default {
    emits: ['deletingTask', 'updatingTask'],
    props: ['task'],
    data: () => {
        return {
            taskStatus : null,
        }
    },
    methods: {
        editTask() {
            this.$emit('updatingTask', this.task.id, this.task.name, this.task.desc);
            $('#editTaskTitle').val(this.task.name);
            $('#editTaskDesc').val(this.task.desc);
        },
        deleteTask() {
            axios.delete('api/task/' + this.task.id).then(response => {
                this.alert("Successfully delete task", "Success!", "success");
                this.$emit('deletingTask');
            }).catch(error => {
                console.log(error);
            })
        },
        async updateStatus(task) {
            let status = task.status ? 0 : 1;
            this.taskStatus = status;
            task.status = status;
            await axios.put('api/task/' + task.id, {
                task: {
                    name: task.name,
                    desc: task.desc,
                    status: status,
                }
            }).catch(error => {
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>
.btn-edit {
    cursor: pointer;
}

.edit {
    color: orange;
}

.delete {
    color: red;
}
</style>