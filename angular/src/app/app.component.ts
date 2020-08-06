import { Component } from '@angular/core';
import {HttpClient, HttpErrorResponse,HttpParams} from "@angular/common/http";
import {Card} from "./card";
import { FormsModule } from '@angular/forms';
//import {}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  //responsedata = new Card(null,null,null,null,);

  constructor(private http: HttpClient) {
  }

  title = "Add A Card";
  confirm_msg = '';
  data_submitted = '';
  cardModels = ["Discover IT", "Amazon Prime Rewards Visa Signature", "Chase Freedom Unlimited", "Chase Freedom", "Chase Sapphire Preferred", "Chase Sapphire Reserve"];
  status: boolean = false;
  clickEvent(){
    this.status = true;
  }

  responsedata = new Card(null,null,null,null,null);

  cardTemp = new Card("Discover IT","5% cashback Restaurants, 3% cashback Grocery Stores, 1% cashback elsewhere",10000,10000,"username");

  confirmSubmission(data){
    this.confirm_msg = "You submitted the following:";
    this.confirm_msg += " Card Model: "+ data.cardModel;
  }

  onSubmit(form: any): void {
    console.log('You submitted value: ', form);
    this.data_submitted = form;

    // Convert the form data to json format
    let params = JSON.stringify(form);

    // http.get() and http.post() returns observable<Order>,
    // then we subscribe to this observable

    // To send a GET request, use the concept of URL rewriting to pass data to the backend
    // this.http.get<Order>('http://localhost/cs4640/ng-php/ngphp-get.php?str='+params)
    // To send a POST request, pass data as an object
    this.http.post<Card>('http://localhost/Churn/php/cardAdder.php', params)
      .subscribe((data) => {
        // Receive a response successfully, do something here
        // console.log('Response from backend ', data);
        this.responsedata = data;     // assign response to responsedata property to bind to screen later

        // the subscribe above means that this observable takes (data) being emitted
        // and set it to this.responsedata

        console.log('response data ', this.responsedata);

      }, (error) => {
        // An error occurs, handle an error in some way
        console.log('Error ', error);
      })
  }



}
