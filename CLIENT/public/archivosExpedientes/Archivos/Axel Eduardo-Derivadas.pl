%Fernando Morales Robles
%Universidad Politecnica de Quintana Roo
%
%
%
%Derivadas: ejemplos
%
%1
derivada(X,X,1).
%2
derivada(C,X,0):-atomic(C),C\=X.
%3
derivada(X^N,X,N*X^NN):-N>0,NN is N - 1.
%4
derivada(U+V,X,DU+DV):-derivada(U,X,DU),derivada(V,X,DV).
%5
derivada(U-V,X,DU-DV):-derivada(U,X,DU),derivada(V,X,DV).
%6
derivada(-U,X,-DV):-derivada(U,X,DV).
%7
derivada(U^N,X,(N*U^NN)*DU):-derivada(U,X,DU),N>0,NN is N-1.
%8
derivada(U*V,X,DU*V+U*DV):- derivada(U,X,DU), derivada(V,X,DV).
%9
derivada(U/V,X,(DU*V+U*DV)/V^2):- derivada(U,X,DU), derivada(V,X,DV).
%10
derivada(U^N,X,N*U^(N-1)*DU):-integer(N), atomic(N), N\==X,derivada(U,X,DU).
%11
derivada(-V,X,-DV):- derivada(V,X,DV).
%12
derivada(exp(V),X,exp(V)*DV):- derivada(V,X,DV).
%13
derivada(ln(V),X,DV/V):- derivada(V,X,DV).
%14
derivada(A^V,X,(A^V)*ln(A)*DV):-integer(A), atomic(A), A\==X,derivada(V,X,DV).
%15
derivada(sen(W),X,Z*cos(W)):- derivada(W,X,Z).
%16
derivada(cos(W),X,-Z*sen(W)):- derivada(W,X,Z).
%17
derivada(tg(W),X,Z*sec(W)^2):- derivada(W,X,Z).
%18
derivada(cotg(W),X,-Z*csc(W)^2):- derivada(W,X,Z).
%19
derivada(sec(W),X,Z*sec(W)*tg(W)):- derivada(W,X,Z).
%20
derivada(csc(W),X,-Z*csc(W)*cotg(W)):- derivada(W,X,Z).
%21
derivada(arcsen(V),X,(1-V^2)^(-1/2)*DV):- derivada(V,X,DV).
%22
derivada(arccos(V),X,-(1-V^2)^(-1/2)*DV):- derivada(V,X,DV).
%23
derivada(arctg(V),X,(1+V^2)^(-1)*DV):- derivada(V,X,DV).
%24
derivada(arccotg(V),X,-(1+V^2)^(-1)*DV):- derivada(V,X,DV).
%25
derivada(arcsec(V),X,(V^2-1)^(-1/2)*DV):- derivada(V,X,DV).
%26
derivada(arccsc(V),X,-(V^2-1)^(-1/2)*DV):- derivada(V,X,DV).
%27
derivada(senh(W),X,Z*cosh(W)):- derivada(W,X,Z).
%28
derivada(cosh(W),X,-Z*senh(W)):- derivada(W,X,Z).
%29
derivada(tgh(W),X,Z*sech(W)^2):- derivada(W,X,Z).
%30
derivada(cotgh(W),X,-Z*csch(W)^2):- derivada(W,X,Z).
%31
derivada(sech(W),X,Z*sech(W)*tgh(W)):- derivada(W,X,Z).

%Simplificacion

simplifica(X+0,X).
simplifica(1*X,X).
simplifica(X^1,X).
simplifica(X^0,X/X).
simplifica(X^A*X^B,X^C):- C is A+B.
simplifica(X^A/X^B,X^C):- C is A-B.
simplifica(X*(A+B),X*C):- C is A+B.
simplifica(X*(A-B),X*C):- C is A-B.
