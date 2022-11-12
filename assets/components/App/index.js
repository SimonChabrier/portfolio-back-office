// import React
import React from 'react';

// import Components
import Projects from '../Projects';

// Start App class
class App extends React.PureComponent {
  
  // Lifecycle method
  state = {
    title: 'Default Title'
  }

  // Methods

  componentDidMount() {
    console.log('App mounted');
  }

  // Render method
  render() {
    return (
      <>
        <Projects />
      </>
    )
  }
}

export default App;