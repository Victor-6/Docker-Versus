import React, { useEffect, useState } from 'react';
import Axios from 'axios';

export default function PageAccueil() {
  
  const [databdd, setDatabdd] = useState([]);
  
  const fetchData = async () => {
    const url = `http://localhost:8000/api`;

    Axios.get(url)
      .then((response) => {
        setDatabdd(response.data);
        console.log(response)
      })
      .catch((error) => {
        console.log(error.response)
      });
  }
  useEffect(() => {
    fetchData();
  }, [])

  return(
    <div className="main">
        <ul>
        {databdd.map((databdd) => {
          return (
            <h1 key="{databdd.title}">{databdd.title}</h1>
          )
        })}
          <li>
          {databdd.map((databdd) => {
          return (
            <h2 key="{databdd.description}">{databdd.description}</h2>
          )
        })}
          </li>
        </ul>
    </div>
  )
}