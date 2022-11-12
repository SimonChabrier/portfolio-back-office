// import React
import React from 'react';

// import Components
import Projects from '../Projects';
import SignupForm from '../Form';
import FormYup from '../Yup';

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
        <SignupForm />
        <FormYup />
      </>
    )
  }
}

export default App;