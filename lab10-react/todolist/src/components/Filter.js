import React from "react"

class Filter extends React.Component {


    render() {
        return (
            <div className="todo-item">
                <input 
                    type="checkbox" 
                    checked={this.props.hideCompleted} 
                    onChange={() => this.props.toggleHideCompleted()}/>
                <p> Hide completed</p>
            </div>
        )
    }
}

export default Filter