/**********************************************
Program: Leave Management System.cpp
Course: TCP1201
Year: 2016/17 Trimester 1
Name: Raja Roza Athirah Binti Raja Aznir Shah
ID: 1142700942
Lecture: TC01
Lab: TT02
Email: rozaathirah@gmail.com
Phone: 013-3344161
***********************************************/
#include <iostream>
#include <string>
#include <cstdlib>
#include "Staff.h"

using namespace std;

ostream& operator<<(ostream& os, Staff st)
{
    os << "\nStaff name\t: " << st.getName()
        << "\nStaff Id\t: " << st.getId()
        << "\nPosition\t: " << st.getSpos()
        << "\nCategory\t: " << st.getCategory()
        << "\nContact no.\t: " << st.getTelno()
        << "\nDepartment\t: " << st.getDept()
        << "\nBalance\t\t: " << st.getBal() << endl;
    return os;
}

bool operator==(Staff st1, Staff st2)
{
    return st1.getId() == st2.getId();
}

bool operator<(Staff st1, Staff st2)
{
    return st1.getId()<st2.getId();
}

bool operator<=(Staff st1, Staff st2)
{
    return st1.getId()<=st2.getId();
}

bool operator>=(Staff st1, Staff st2)
{
    return st1.getId()>=st2.getId();
}

bool operator==(LeaveRecord& lv1, LeaveRecord& lv2)
{
    return lv1.getStartDate() == lv2.getStartDate();
}

bool operator<(LeaveRecord& lv1, LeaveRecord& lv2)
{
    return lv1.getStartDate()<lv2.getStartDate();
}

bool operator<=(LeaveRecord& lv1, LeaveRecord& lv2)
{
    return lv1.getStartDate()<=lv2.getStartDate();
}

bool operator>=(LeaveRecord& lv1, LeaveRecord& lv2)
{
    return lv1.getStartDate()>=lv2.getStartDate();
}

template <typename ItemType>
void displayList(ListInterface<ItemType>& listPtr)
{
    cout << "\n";
     cout << "        ================================================== " << endl
          << "        |            LIST OF REGISTERED STAFF            |" << endl
          << "        ================================================== \n" << endl;
    for (int pos = 1; pos <= listPtr.getLength(); pos++)
    {
        ItemType s = listPtr.getEntry(pos);
        cout <<  s << endl;
    }
        //cout << endl;
        cout << "===================================================================== " << endl;
}



int main()
{
    int choice, recno, id, bal;
    string filename, name, spos, category, telno, dept, startDate, endDate, type, reason, approver, status;
    LinkedList<Staff> listSt;

    do {
        system("cls");
        cout <<"        +++++++++++++++++++++++++++++++++++++++++++" << endl
             <<"        |                                         |" << endl
             <<"        |                                         |" << endl
             <<"        +          MULTIMEDIA UNIVERSITY          +" << endl
             <<"        +         LEAVE MANAGEMENT SYSTEM         +" << endl
             <<"        |                                         |" << endl
             <<"        |                                         |" << endl
             <<"        +++++++++++++++++++++++++++++++++++++++++++\n\n" << endl;

        cout << endl;
        cout <<"1. Register a New Staff"<< endl;
        cout <<"2. Register a New Staff (Sorted by ID)" << endl;
        cout <<"3. Display A Record by Staff Position"<< endl;
        cout <<"4. Display ALL Records"<< endl;
        cout <<"5. Apply for Leave" << endl;
        cout <<"6. Display Leave by Staff Name" << endl;
        cout <<"7. Quit"<< endl;
        cout << endl;
        cout <<"Choice --> ";
        cin >> choice;

        switch(choice){
            case 1:{
                    system("cls");
                    cout << "\n";
                    cout << "        ============================================= " << endl
                         << "        |              ENTER STAFF INFO             |" << endl
                         << "        ============================================= \n" << endl;

                    cout << "Staff name: ";
                    cin >> name;
                    cout << "Staff ID: ";
                    cin >> id;
                    cout << "Position: ";
                    cin >> spos;
                    cout << "Category: ";
                    cin >> category;
                    cout << "Contact No: ";
                    cin >> telno;
                    cout << "Department: ";
                    cin >> dept;
                    cout << "Balance: ";
                    cin >> bal;
                    cout << "================================================================= " << endl;
                    Staff st(name, id, spos, category, telno, dept, bal);
                    listSt.insertFront(st);
                    break;
            }

            /*
            case 3 :
                    listPtr->removeFront();
                    break;
            case 4 :
                    listPtr->removeLast();
                    break;*/
            case 2 :{
                    system("cls");
                    cout << "\n";
                    cout << "        ============================================= " << endl
                         << "        |              ENTER STAFF INFO             |" << endl
                         << "        ============================================= \n" << endl;

                    cout << "Staff name: ";
                    cin >> name;
                    cout << "Staff ID: ";
                    cin >> id;
                    cout << "Position: ";
                    cin >> spos;
                    cout << "Category: ";
                    cin >> category;
                    cout << "Contact No: ";
                    cin >> telno;
                    cout << "Department: ";
                    cin >> dept;
                    cout << "Balance: ";
                    cin >> bal;
                    cout << "================================================================= " << endl;
                    Staff st(name, id, spos, category, telno, dept, bal);
                    listSt.sortInsert(st);
                    break;
            }

            case 3:{
                    system("cls");
                    cout << "       ==================================== " << endl
                         << "       |            STAFF INFO            |" << endl
                         << "       ==================================== \n" << endl;
                    cout << "Enter the position to retrieve the record: ";
                    cin >> recno;
                    for(int i=1; i<=listSt.getLength(); i++){
                        cout << i << ". " << listSt.getEntry(i).getName() << endl;
                    }
                    cout << endl;
                    cout << listSt.getEntry(recno) << endl;
                    break;
            }


            case 4:{
                    system("cls");
                    displayList(listSt);
                    break;
            }


            case 5:{
                    system("cls");
                    cout << "\n";
                    cout << "       ======================================= " << endl
                         << "       |            LIST OF STAFF            |" << endl
                         << "       ======================================= \n" << endl;
                    for(int i=1; i<=listSt.getLength(); i++){
                        cout << i << ". " << listSt.getEntry(i).getName() << endl;
                    }
                    cout << "\nChoose which staff to apply leave (1,2,3...): ";
                    cin >> recno;
                    cout << "=================================================================== " << endl;

                    cout << "\nPlease fill in the form to apply for leave..." << endl;
                    cout << "\n";
                            cout << "      ============================================== " << endl
                                 << "      |              STAFF LEAVE FORM              |" << endl
                                 << "      ============================================== \n" << endl;
                    cout << "Start date (dd/mm/yyy): ";
                    cin >> startDate;
                    cout << "End date (dd/mm/yyy): ";
                    cin >> endDate;
                    cin.ignore();
                    cout << "Type of leave: ";
                    getline(cin, type);
                    cout << "Reason: ";
                    getline(cin, reason);
                    cout << "Approver: ";
                    getline(cin, approver);
                    cout << "Status: ";
                    getline(cin, status);
                    cout << "=================================================================== " << endl;
                    LeaveRecord* lv = new LeaveRecord(startDate, endDate, type, reason, approver, status);
                    Staff st(name, id, spos, category, telno, dept, bal);
                    st.addLeaveFront(lv);
                    listSt.setEntry(recno, st);
                    break;
            }

            case 6:{
                    system("cls");
                    Staff st(name, id, spos, category, telno, dept, bal);
                    cout << "\n";
                    cout << "       ======================================= " << endl
                         << "       |            LIST OF STAFF            |" << endl
                         << "       ======================================= \n" << endl;
                    for(int i=1; i<=listSt.getLength(); i++){
                        cout << i << ". " << listSt.getEntry(i).getName() << endl;
                    }
                    cout << "\nChoose which staff to show leave records (1,2,3...): ";
                    cin >> recno;
                    cout << " ================================================================= " << endl;
                    cout << endl;
                    listSt.getEntry(recno).displayLeaveAll();
                    cout << "=================================================================== " << endl;
                    cout << endl;
                    break;
                    //listSt->getEntry(recno).displayLeaveAll();
            }

            case 7:{
                    exit(0);
                    break;
            }

            default : {
                    system("cls");
                    cout <<"Invalid choice"<< endl;
                    break;
            }
        }
        system("pause");
    } while ( choice != 7 );
    system("cls");

    cout <<"\nYou have successfully logged out of the system."<< endl;

    return 0;
}


