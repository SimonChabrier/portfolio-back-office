import './style.scss';
import React from "react";
import Project from './Project';

const Projects = ({ projects }) => (

        projects.map((project) => (
            <Project 
                title = {project.title}
                description = {project.desciption}
                image = {project.picture}
                links = {project.links}
                id = {project.id}
            />
     
        ))


);



export default Projects;