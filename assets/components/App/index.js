// import React
import React from 'react';

// import Components
import Header from '../../components/Header';

// Start App class
class App extends React.PureComponent {
  // Lifecycle method
  state = {
    title: 'Default Title'
  }

  // Methods

  // Render method
  render() {
    return (
      <div>
        <Header title={this.state.title}/>
      </div>
    )
  }
}

export default App;