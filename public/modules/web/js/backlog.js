// new Backlog().boot({
//     selectTasksButtonNode: document.querySelector('#select-backlog-tasks'),
//     taskCheckboxNodes: document.querySelectorAll('#backlog-checkbox'),
//     bulkActionsModalNode: document.querySelector('#backlog-bulk-actions'),
//     singleTaskSkeletonNode: document.querySelector('#single-task-skeleton'),
// });

class Backlog {
    /**
     * Configuration object for the Backlog.
     *
     * @type {Object}
     * @property {HTMLElement} selectTasksButtonNode - The button node for selecting tasks.
     * @property {HTMLElement} singleTaskCheckboxNode - The checkbox node for a single task.
     * @property {HTMLElement} massActionsModalNode - The modal node for mass actions.
     * @property {HTMLElement} singleTaskSkeletonNode - The skeleton node for a single task.
     */
    config;

    /**
     * Initializes a new instance of the Backlog class.
     *
     * @param {Object} config - The configuration object.
     */
    boot(config) {
        this.validateConfig(config);
    }

    initSelectTasksButton() {

    }

    /**
     * Validate handed by client config;
     *
     * @param {Object} config - The configuration object.
     */
    validateConfig(config) {
        const requiredFields = [
            'selectTasksButtonNode', 'taskCheckboxNodes',
            'bulkActionsModalNode', 'singleTaskSkeletonNode'
        ];

        const hasAllRequiredFields = requiredFields.every(field => config.hasOwnProperty(field));

        if (!hasAllRequiredFields) {
            throw 'Invalid backlog configuration handed!';
        }

        this.config = config;
    }
}

class BacklogTask {
    bulkInsert() {

    }

    bulkRemove() {

    }

    insert() {

    }

    remove() {

    }

    getSkeletonNode() {

    }
}