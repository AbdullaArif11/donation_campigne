import React from 'react'
import ReactDOM from 'react-dom/client'
import App from './App.jsx'
import './index.css'
import {
  createBrowserRouter,
  RouterProvider,
} from "react-router-dom";
import Root from './Conponents/Root/Root.jsx';
import Home from './Conponents/Home/Home.jsx';
import Donation from './Conponents/Donation/Donation.jsx';
import Statistics from './Conponents/Statistics/Statistics.jsx';
import ErrorPage from './Conponents/ErrorPage/ErrorPage.jsx';
import Details from './Conponents/Details/Details.jsx';
import Home2 from './Conponents/Home2/Home2.jsx';
import Details2 from './Conponents/Details2/Details2.jsx';
import VolunteerRegistration from './Conponents/Volunteers/VolunteerRegistration.jsx';

// Define individual fetch functions
const fetchData = () => fetch('/Data.json').then(response => response.json());
const fetchData2 = () => fetch('/Data2.json').then(response => response.json());

const router = createBrowserRouter([
  {
    path: "/",
    element: <Root></Root>,
    errorElement: <ErrorPage></ErrorPage>,
    children: [
      {
        path: '/',
        element: <Home></Home>,
        loader: fetchData
      },
      {
        path: '/Home2',
        element: <Home2></Home2>,
        loader: fetchData2
      },
      {
        path: "/Donation",
        element: <Donation></Donation>,
        loader: fetchData
      },
      {
        path: "/Statistics",
        element: <Statistics></Statistics>,
        loader: fetchData
      },
      {
        path: "/details/:id",
        element: <Details></Details>,
        loader: fetchData
      },
      {
        path: "/details2/:id",
        element: <Details2></Details2>,
        loader: fetchData2
      },
      {
        path: "/VolunteerRegistration",
        element: <VolunteerRegistration></VolunteerRegistration>,
        
      }
    ]
  },
]);

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <RouterProvider router={router} />
  </React.StrictMode>,
)
