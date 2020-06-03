import React from "react"
import todosData from "./todosData"
import ToDoList from "./ToDoList"
import  Filter from "./Filter"
import Task from "./Task"
import NewTask from "./NewTask"

class App extends React.Component {

    constructor() {
        super()
        this.state = {
            todos: todosData,
            hideCompleted: false,
            nextKey: 3
        }
        this.handleChange = this.handleChange.bind(this)
    }


    /**
     * Changes completed value after checking single task 
     * Updates todos array
     * @param id of checked task 
     */
    handleChange(id) {
        this.setState(prevState => {
            const updatedTodos = prevState.todos.map(todo => {
                if (todo.id === id) {
                        todo.completed = !todo.completed
                    }
                    return todo
            })
            return {
                todos: updatedTodos
            }
        })
    }

    toggleHideCompleted() {
        let prevHideCompleted = this.state.hideCompleted
        this.setState({
          hideCompleted: !prevHideCompleted
        })
      }

    /**
     * Renders todos and filteres completed if checked
     */
    renderTodos() {
        let todoItems = this.state.todos

        if (this.state.hideCompleted) {
                todoItems = todoItems.filter(item => !item.completed)
        }

        todoItems = todoItems.map(item => <Task key={item.id} 
            item={item} 
            handleChange={this.handleChange} />)

        return todoItems
    }

    addTodoToArray(newText) {
        let todosWithAdded = this.state.todos
        todosWithAdded.push({id: this.state.nextKey, text: newText, completed: false})
        this.setState({
            todos: todosWithAdded,
            nextKey: this.state.nextKey + 1
        })
    }

    render() {
        return (
            <div className="todo-app">
                <h1>Welcome to my TODO list</h1>
                <Filter hideCompleted={this.state.hideCompleted} toggleHideCompleted={this.toggleHideCompleted.bind(this)}/>
                <ToDoList todoItems = { this.renderTodos() }/>  
                <NewTask addTodoToArray = {this.addTodoToArray.bind(this)} />
            </div>
        )
    }
}

export default App