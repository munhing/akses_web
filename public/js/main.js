Vue.component('task-list', {
    template: `
        <div>
            <task v-for="task in tasks">{{ task.task }}>/task>
        </div>
    `,

    data() {
        return {
            tasks: [
                {task: 'goto the store'},
                {task: 'goto the supermarket'},
                {task: 'goto the cinema'},
                {task: 'goto the cafe'}
            ]
        }
    }
});

Vue.component('task', {
    template: `
        <ul>
            <li><slot></slot></li>
        </ul>
    `,
});