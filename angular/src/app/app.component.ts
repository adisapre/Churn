import { Component } from '@angular/core';
import {HttpClient, HttpErrorResponse,HttpParams} from "@angular/common/http";
import {Card} from "./card";

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


}
