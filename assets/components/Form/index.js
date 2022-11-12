import React from 'react';
import { useFormik } from 'formik';
import './style.scss';

const SignupForm = () => {
  // Pass the useFormik() hook initial form values and a submit function that will
  // be called when the form is submitted
  const formik = useFormik({

    initialValues: {
        title: '',
        description: '',
    },

    onSubmit: values => {
        //TODO post to API
      alert(JSON.stringify(values, null, 2));
    },
  });

  return (
    <form onSubmit={formik.handleSubmit} className="form">

      <label htmlFor="title">Titre</label>
      <input id="title" name="title" type="text" onChange={formik.handleChange} value={formik.values.title}/>

      <label htmlFor="description">Description</label>
      <textarea id="description" name="description" type="tex" rows="5" cols="33" onChange={formik.handleChange} value={formik.values.description}/>

      <button type="submit">Submit</button>
    </form>
  );
};

export default SignupForm;