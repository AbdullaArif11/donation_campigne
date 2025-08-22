import React, { useState } from 'react';
import axios from 'axios';

const VolunteerRegistration = () => {
    const [formData, setFormData] = useState({
        first_name: '',
        last_name: '',
        email: '',
        contact_no: '',
        branch: '',
        address: '',
        photo: null,
        gender: ''
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData({ ...formData, [name]: value });
    };

    const handlePhotoChange = (e) => {
        setFormData({ ...formData, photo: e.target.files[0] });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        const data = new FormData();
        Object.keys(formData).forEach(key => {
            if (formData[key] !== null && formData[key] !== '') {
                data.append(key, formData[key]);
            }
        });

        try {
            const response = await axios.post('http://localhost/Web%20Technology/Donation%20campigne/src/Components/Volunteers/register_volunteer.php', data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            console.log(response.data); // Debugging line
            alert(response.data.message);
        } catch (error) {
            console.error('Error: ', error); // Debugging line
            alert('Error: ' + error.message);
        }
    };

    return (
        <div className="flex justify-center items-center min-h-screen bg-gray-100">
            <form onSubmit={handleSubmit} className="bg-white p-6 rounded shadow-md w-full max-w-lg">
                <h2 className="text-2xl font-bold mb-6">Volunteer Registration</h2>
                <div className="mb-4">
                    <label className="block text-gray-700">First Name</label>
                    <input type="text" name="first_name" onChange={handleChange} className="bg-white w-full px-3 py-2 border rounded" required />
                </div>
                <div className="mb-4">
                    <label className="block text-gray-700">Last Name</label>
                    <input type="text" name="last_name" onChange={handleChange} className="bg-white w-full px-3 py-2 border rounded" required />
                </div>
                <div className="mb-4">
                    <label className="block text-gray-700">Email</label>
                    <input type="email" name="email" onChange={handleChange} className="bg-white w-full px-3 py-2 border rounded" required />
                </div>
                <div className="mb-4">
                    <label className="block text-gray-700">Contact Number</label>
                    <input type="text" name="contact_no" onChange={handleChange} className="bg-white w-full px-3 py-2 border rounded" required />
                </div>

                <div className="mb-4">
                    <label className="block text-gray-700">Branch</label>
                    <select name="branch" onChange={handleChange} className="w-full px-3 py-2 border rounded" required>
                        <option value="">Select Branch</option>
                        <optgroup label="Dhaka Division">
                            <option value="Dhaka, Dhaka">Dhaka, Dhaka</option>
                            <option value="Dhaka, Faridpur">Dhaka, Faridpur</option>
                            <option value="Dhaka, Gazipur">Dhaka, Gazipur</option>
                            <option value="Dhaka, Gopalganj">Dhaka, Gopalganj</option>
                            <option value="Dhaka, Kishoreganj">Dhaka, Kishoreganj</option>
                            <option value="Dhaka, Madaripur">Dhaka, Madaripur</option>
                            <option value="Dhaka, Manikganj">Dhaka, Manikganj</option>
                            <option value="Dhaka, Munshiganj">Dhaka, Munshiganj</option>
                            <option value="Dhaka, Narayanganj">Dhaka, Narayanganj</option>
                            <option value="Dhaka, Narsingdi">Dhaka, Narsingdi</option>
                            <option value="Dhaka, Rajbari">Dhaka, Rajbari</option>
                            <option value="Dhaka, Shariatpur">Dhaka, Shariatpur</option>
                            <option value="Dhaka, Tangail">Dhaka, Tangail</option>
                        </optgroup>
                        <optgroup label="Chittagong Division">
                            <option value="Chittagong, Bandarban">Chittagong, Bandarban</option>
                            <option value="Chittagong, Brahmanbaria">Chittagong, Brahmanbaria</option>
                            <option value="Chittagong, Chandpur">Chittagong, Chandpur</option>
                            <option value="Chittagong, Chattogram">Chittagong, Chattogram</option>
                            <option value="Chittagong, Cox's Bazar">Chittagong, Cox's Bazar</option>
                            <option value="Chittagong, Cumilla">Chittagong, Cumilla</option>
                            <option value="Chittagong, Feni">Chittagong, Feni</option>
                            <option value="Chittagong, Khagrachari">Chittagong, Khagrachari</option>
                            <option value="Chittagong, Lakshmipur">Chittagong, Lakshmipur</option>
                            <option value="Chittagong, Noakhali">Chittagong, Noakhali</option>
                            <option value="Chittagong, Rangamati">Chittagong, Rangamati</option>
                        </optgroup>
                        <optgroup label="Rajshahi Division">
                            <option value="Rajshahi, Bogura">Rajshahi, Bogura</option>
                            <option value="Rajshahi, Joypurhat">Rajshahi, Joypurhat</option>
                            <option value="Rajshahi, Naogaon">Rajshahi, Naogaon</option>
                            <option value="Rajshahi, Natore">Rajshahi, Natore</option>
                            <option value="Rajshahi, Chapainawabganj">Rajshahi, Chapainawabganj</option>
                            <option value="Rajshahi, Pabna">Rajshahi, Pabna</option>
                            <option value="Rajshahi, Rajshahi">Rajshahi, Rajshahi</option>
                            <option value="Rajshahi, Sirajganj">Rajshahi, Sirajganj</option>
                        </optgroup>
                        <optgroup label="Khulna Division">
                            <option value="Khulna, Bagerhat">Khulna, Bagerhat</option>
                            <option value="Khulna, Chuadanga">Khulna, Chuadanga</option>
                            <option value="Khulna, Jashore">Khulna, Jashore</option>
                            <option value="Khulna, Jhenaidah">Khulna, Jhenaidah</option>
                            <option value="Khulna, Khulna">Khulna, Khulna</option>
                            <option value="Khulna, Kushtia">Khulna, Kushtia</option>
                            <option value="Khulna, Magura">Khulna, Magura</option>
                            <option value="Khulna, Meherpur">Khulna, Meherpur</option>
                            <option value="Khulna, Narail">Khulna, Narail</option>
                            <option value="Khulna, Satkhira">Khulna, Satkhira</option>
                        </optgroup>
                        <optgroup label="Barisal Division">
                            <option value="Barisal, Barguna">Barisal, Barguna</option>
                            <option value="Barisal, Barishal">Barisal, Barishal</option>
                            <option value="Barisal, Bhola">Barisal, Bhola</option>
                            <option value="Barisal, Jhalokati">Barisal, Jhalokati</option>
                            <option value="Barisal, Patuakhali">Barisal, Patuakhali</option>
                            <option value="Barisal, Pirojpur">Barisal, Pirojpur</option>
                        </optgroup>
                        <optgroup label="Sylhet Division">
                            <option value="Sylhet, Habiganj">Sylhet, Habiganj</option>
                            <option value="Sylhet, Moulvibazar">Sylhet, Moulvibazar</option>
                            <option value="Sylhet, Sunamganj">Sylhet, Sunamganj</option>
                            <option value="Sylhet, Sylhet">Sylhet, Sylhet</option>
                        </optgroup>
                        <optgroup label="Rangpur Division">
                            <option value="Rangpur, Dinajpur">Rangpur, Dinajpur</option>
                            <option value="Rangpur, Gaibandha">Rangpur, Gaibandha</option>
                            <option value="Rangpur, Kurigram">Rangpur, Kurigram</option>
                            <option value="Rangpur, Lalmonirhat">Rangpur, Lalmonirhat</option>
                            <option value="Rangpur, Nilphamari">Rangpur, Nilphamari</option>
                            <option value="Rangpur, Panchagarh">Rangpur, Panchagarh</option>
                            <option value="Rangpur, Rangpur">Rangpur, Rangpur</option>
                            <option value="Rangpur, Thakurgaon">Rangpur, Thakurgaon</option>
                        </optgroup>
                        <optgroup label="Mymensingh Division">
                            <option value="Mymensingh, Jamalpur">Mymensingh, Jamalpur</option>
                            <option value="Mymensingh, Mymensingh">Mymensingh, Mymensingh</option>
                            <option value="Mymensingh, Netrokona">Mymensingh, Netrokona</option>
                            <option value="Mymensingh, Sherpur">Mymensingh, Sherpur</option>
                        </optgroup>
                    </select>
                </div>

                <div className="mb-4">
                    <label className="block text-gray-700">Address</label>
                    <textarea name="address" onChange={handleChange} className="bg-white w-full px-3 py-2 border rounded" required></textarea>
                </div>
                <div className="mb-4">
                    <label className="block text-gray-700">Photo</label>
                    <input type="file" name="photo" onChange={handlePhotoChange} className="bg-white w-full px-3 py-2 border rounded" required />
                </div>
                <div className="mb-4">
                    <label className="block text-gray-700">Gender</label>
                    <select name="gender" onChange={handleChange} className="bg-white w-full px-3 py-2 border rounded" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <button type="submit" className="w-full bg-gradient-to-br from-[#1A5319] via-[#508D4E] via-[#80AF81] to-[#88ea8e] text-white py-2 rounded">Register</button>
            </form>
        </div>
    );
};

export default VolunteerRegistration;
