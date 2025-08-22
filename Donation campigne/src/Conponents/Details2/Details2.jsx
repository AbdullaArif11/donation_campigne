import { useLoaderData, useParams } from "react-router-dom";
import swal from "sweetalert";

const Details2 = () => {
  const params = useParams();
  let {id} = params || {};
  const cards = useLoaderData();
  const {Title, Description,Link,Text_button_bg,Picture} = cards[id-1];
  const btnBg = {
    backgroundColor: `${Text_button_bg}`
  }

  return (
    <div className="relative p-5 md:p-10 flex max-w-max flex-col rounded-xl bg-white">
    <div className="relative m-0 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none">
      <img
        className="w-full"
        src={Picture}
        alt="ui/ux review check"
      />
      <div className="w-full bg-[#0B0B0B80] absolute bottom-0 p-[2.5%] md:p-[3.5%]">
      <a href={Link}><button
          style={btnBg}
          className={` btn h-14 bg-[${Text_button_bg}] text-white text-xl font-semibold py-3 px-6 rounded-[4px]`}> Visit </button>
      </a>
      </div>
    </div>
    <div className="my-14">
      <h4 className="block text-4xl font-bold tracking-normal text-[#0B0B0B] antialiased">
        {Title}
      </h4>
      <p className="mt-6 block text-base font-normal text-[#0B0B0BB2] text-justify antialiased">
        {Description}
      </p>
    </div>

  </div>
  );
};

export default Details2;