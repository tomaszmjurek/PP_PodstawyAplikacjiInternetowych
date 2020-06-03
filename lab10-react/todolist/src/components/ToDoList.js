import React from "react"

class ToDoList extends React.Component {

    render() {
        return (
           <div className="todo-list">
               { this.props.todoItems.length > 0 ? this.props.todoItems : <p>Nothing to do...</p> }
           </div>
       )
    }
}

export default ToDoList