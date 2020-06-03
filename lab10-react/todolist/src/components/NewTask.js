import React from "react"

class NewTask extends React.Component {

    constructor() {
        super()
        this.state = {
            newTodo: ""
        }
        this.getTodo = this.getTodo.bind(this)
    }

    getTodo(event) {
        this.setState({
            newTodo: event.target.value
        })
    }

    addNewTodo() {
        let inputText = this.state.newTodo
        this.props.addTodoToArray(inputText)
        let clearedInput = ""
        this.setState({newTodo: clearedInput})
    }

    render() {
        return (
            <div>
                <input type="text" value={this.state.newTodo} onChange={this.getTodo}/>
                <button onClick={() => this.addNewTodo()}> Add </button>
            </div>
        )
    }
}

export default NewTask