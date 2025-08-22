import { Link } from "react-router-dom";
import Navbar from "../Navbar/Navbar";

const ErrorPage = () => {
  return (
    <div>
      <Navbar></Navbar>
      <div className="flex flex-col text-center justify-center items-center h-screen">
      <h1 className="text-3xl font-bold">Oops! Page Not Found !!!</h1>
      <p>We're sorry, but the page you're looking for does not exist.</p>
      <p>You can go back to the <a href="/">home page</a> or try searching for what you're looking for.</p>
      </div>
    </div>
  );
};

export default ErrorPage;