
import logoImage from '../Navlogo/Logo2.jpg';
import { NavLink } from "react-router-dom";

const Navbar = () => {
 
  const Active = ({ isActive, isPending }) =>
  isPending ? "pending" : isActive ? "text-[#508D4E] font-bold underline" : "";

  return (
    <div className="flex flex-col md:flex-row items-center p-2 my-3 border-solid border-2 shadow-2xl">

      <div className="flex-1">
        <a className="btn btn-ghost normal-case text-xl p-0 ml-4"><img className="h-11" src={logoImage} alt="Logo" /></a>
      </div>

      <div className="flex-none">
        <ul className="flex gap-10 px-1">
          <li><NavLink to="/" className={Active}>Home</NavLink></li>
          <li><NavLink to="/donation" className={Active}>Donation</NavLink></li>
          <li><NavLink to="statistics" className={Active}>Statistics</NavLink></li>
          <li><NavLink to="Home2" className={Active}>Other trusted</NavLink></li>
        </ul>
      </div>

    </div>
  );
};

export default Navbar;