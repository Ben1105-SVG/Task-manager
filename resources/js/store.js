import { defineStore } from 'pinia'
import axios from "axios";
const base_url = `${import.meta.env.VITE_API_BASE_URL}`

export const useMainStore = defineStore('main', {
    state: () => {
        return {
            tasks: [],
            activeTask: {},
        }
    },
    actions: {
        fetchTasks(filters = {}) {
            const query = '?' + new URLSearchParams(filters).toString();

            return new Promise((resolve, reject) => {
                axios.get(`${base_url}/tasks${query}`).then(res => {
                    this.tasks = res.data.data
                    resolve(res.data.data)
                }).catch((e) => reject(e.response.data))
            })
        },
        fetchTask(id) {
            return new Promise((resolve, reject) => {
                axios.get(`${base_url}/tasks/${id}`).then(res => {
                    this.activeTask = res.data.data
                    resolve(res.data.data)
                }).catch((e) => reject(e.response.data))
            })
        },
        updateTask(payload) {
            return new Promise((resolve, reject) => {
                axios.put(`${base_url}/tasks/${payload.id}`, payload).then(res => {
                    this.activeTask = res.data.data
                    resolve(res.data)
                }).catch((e) => reject(e.response.data))
            })
        },
        createTask(payload) {
            return new Promise((resolve, reject) => {
                axios.post(`${base_url}/tasks`, payload).then(res => {
                    this.activeTask = res.data.data
                    resolve(res.data)
                }).catch((e) => reject(e.response.data))
            })
        },
        deleteTask(id) {
            return new Promise((resolve, reject) => {
                axios.delete(`${base_url}/tasks/${id}`).then(res => {
                    resolve(res)
                }).catch((e) => reject(e.response.data))
            })
        },
    },
})
