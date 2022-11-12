import axios from "axios";
import React from "react";
import Projects from "./Projects";

const baseURL = "http://127.0.0.1:8000/api";

const GetProjects = () => {
  const [projects, setProjects] = React.useState(null);

  React.useEffect(() => {
    axios.get(baseURL).then((response) => {
      setProjects(response.data);
    });
  }, []);

  if(projects != null) { 
    return <Projects projects={ projects } />
  }   
  
};

export default GetProjects;