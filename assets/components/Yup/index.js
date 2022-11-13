import React from 'react';
import {Formik, Field, Form, ErrorMessage} from 'formik';

import * as Yup from 'yup';
import axios from 'axios';
import "bootstrap/dist/css/bootstrap.css";

//Valeurs par défaut
const initialValues = {
    title: "",
    picture: "",
    date: "",
    desciption: "",
    acceptTerms: false,
};

// Validation
const validationSchema = Yup.object().shape({
    title: Yup.string().min(5, "trop petit").max(50, "trop long!").required("Ce champ est obligatoire"),
    date: Yup.string(),
    desciption: Yup.string().required("La description est obligatoire"),
});


// Envoi des données
const handleSubmit = (values) => {
 
    axios.post('https://127.0.0.1:8000/api/register', values)
    .then(function (response) {
        console.log(response);
    })
    .catch(function (error) {
        console.log(error);
    });
};

// Rendu du formulaire
const FormYup = () => {
    return (
        <div className="container">
            <div className="row">
                <div className="col-md-6 offset-md-3 pt-3">
                    <h1 className="text-center">Publier</h1>
                    <Formik initialValues={initialValues} validationSchema={validationSchema} onSubmit={(values) =>handleSubmit(values)}>
                        {({ resetForm }) => (
                            <Form>
                                <div className="form-group mb-3">
                                    <label htmlFor="title"> Titre: </label>
                                    <Field type="text" id="title" name="title" className="form-control"/>
                                    <ErrorMessage name="title" component="small" className="text-danger"/>
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="picture"> Image: </label>
                                    <Field type="file" id="picture" name="picture" className="form-control" accept="image/png, image/jpeg" />
                                    {/* <ErrorMessage name="picture" component="small" className="text-danger" /> */}
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="date"> Date: </label>
                                    <Field type="text" id="date" name="date" className="form-control" />
                                    <ErrorMessage name="date" component="small" className="text-danger" />
                                </div>
                                <div className="form-group mb-3">
                                    <label htmlFor="desciption"> Description:</label>
                                    <Field type="textarea" rows="4"  cols="50" id="desciption" name="desciption" className="form-control" />
                                    <ErrorMessage name="desciption" component="small" className="text-danger" />
                                </div>
                                {/* <div className="form-group mb-3">
                                    <label htmlFor="technos"> Technos:</label>
                                    <Field type="text" id="technos" name="technos" className="form-control" />
                                    <ErrorMessage name="technos" component="small" className="text-danger" />
                                </div> */}
                                {/* <div className="form-group mb-3">
                                    <label htmlFor="links"> Liens: </label>
                                    <Field type="text" id="links" name="links" className="form-control" />
                                    <ErrorMessage name="links" component="small" className="text-danger"/>
                                </div> */}
                                <div className="form-group form-check mb-5">
                                    <Field name="acceptTerms" type="checkbox" className="form-check-input" />
                                    <label htmlFor="acceptTerms" className="form-check-label">Je confirme la saisie</label>
                                    <ErrorMessage name="acceptTerms" component="small" className="text-danger d-block"/>
                                </div>
                                <div className="form-group d-flex justify-content-end gap-3">
                                    <button type="submit" className="btn btn-primary">S'inscrire</button>
                                    <button type="button" onClick={resetForm} className="btn btn-danger">Reset</button>
                                </div>
                            </Form>
                        )}
                    </Formik>
                </div>
            </div>
        </div>
    );
};    

export default FormYup;